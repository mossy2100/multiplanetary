<?php

namespace Drupal\book_contents\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\book\BookManagerInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Entity\EntityStorageInterface;

/**
 * Provides a 'Book contents' block.
 *
 * @Block(
 *   id = "book_contents",
 *   admin_label = @Translation("Book contents"),
 *   category = @Translation("Menus")
 * )
 */
class BookContentsBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The request object.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The book manager.
   *
   * @var \Drupal\book\BookManagerInterface
   */
  protected $bookManager;

  /**
   * The node storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $nodeStorage;

  /**
   * The book's pages.
   *
   * @var array
   */
  protected $pages;

  /**
   * Constructs a new BookContentsBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack object.
   * @param \Drupal\book\BookManagerInterface $book_manager
   *   The book manager.
   * @param \Drupal\Core\Entity\EntityStorageInterface $node_storage
   *   The node storage.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition,
    RequestStack $request_stack, BookManagerInterface $book_manager,
    EntityStorageInterface $node_storage) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->requestStack = $request_stack;
    $this->bookManager = $book_manager;
    $this->nodeStorage = $node_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id,
    $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('request_stack'),
      $container->get('book.manager'),
      $container->get('entity.manager')->getStorage('node')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'block_mode' => "all pages",
    ];
  }

  /**
   * {@inheritdoc}
   */
  function blockForm($form, FormStateInterface $form_state) {
    $options = [
      'all pages'  => $this->t('Show block on all pages'),
      'book pages' => $this->t('Show block only on book pages'),
    ];
    $form['book_block_mode'] = [
      '#type'          => 'radios',
      '#title'         => $this->t('Book contents block display'),
      '#options'       => $options,
      '#default_value' => $this->configuration['block_mode'],
      '#description'   => $this->t("If <em>Show block on all pages</em> is selected, the block will contain the automatically generated menus for all of the site's books. If <em>Show block only on book pages</em> is selected, the block will contain only the one menu corresponding to the current page's book. In this case, if the current page is not in a book, no block will be displayed. The <em>Page specific visibility settings</em> or other visibility settings can be used in addition to selectively display this block."),
    ];

    $books = db_query("select b.bid, n.title
      from book b
      left join node_field_data n on b.nid = n.nid
      where b.pid = 0
    ");
    $book_options = [];
    foreach ($books as $book) {
      $book_options[$book->bid] = $book->title;
    }
    $form['bid'] = [
      '#type'          => 'select',
      '#title'         => $this->t('Book to show contents of'),
      '#options'       => $book_options,
      '#description'   => $this->t("Select which book to show the contents of in the block."),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['block_mode'] = $form_state->getValue('book_block_mode');
    $this->configuration['bid'] = $form_state->getValue('bid');
  }

  /**
   * Get the HTML for a book contents list item.
   *
   * @param int $nid
   *   The nid ID of the page.
   * @param int $bid
   *   The bid of the book.
   *
   * @return string
   */
  protected function itemHtml($nid) {
    // Get the page object.
    $page = $this->pages[$nid];

    // Ignore unpublished pages.
    if (!$page->status) {
      return '';
    }

    // Get the current nid.
    $node = \Drupal::routeMatch()->getParameter('node');
    $current_nid = (bool) $node ? $node->id() : 0;

    $html = '';
    $bid = $this->configuration['bid'];

    // Get alias.
    $alias = \Drupal::service('path.alias_manager')->getAliasByPath("/node/$nid");

    // Render link.
    $html .= "<a href='$alias' class='";
    if ($nid == $bid) {
      $html .= " top-page";
    }
    if ($nid == $current_nid) {
      $html .= " current-page";
    }
    $html .= "'>". $page->title . "</a>\n";

    // Render children.
    $list_started = FALSE;
    foreach ($this->pages as $page2) {
      if ($page2->status && $page2->pid == $nid) {
        if (!$list_started) {
          $html .= "<ul>\n";
          $list_started = TRUE;
        }
        $html .= "<li>" . $this->itemHtml($page2->nid) . "</li>\n";
      }
    }
    if ($list_started) {
      $html .= "</ul>\n";
    }

    return $html;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $bid = $this->configuration['bid'];
    $this->pages = [];
    $rs = db_query("
      select b.nid, b.pid, n.title, n.status
      from book b
      left join node_field_data n on b.nid = n.nid
      where bid = :bid
      order by pid, weight
    ", [':bid' => $bid]);
    foreach ($rs as $rec) {
      $this->pages[$rec->nid] = $rec;
    }
    return [
      '#markup' => $this->itemHtml($bid),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return Cache::mergeContexts(parent::getCacheContexts(), ['route.book_contents']);
  }

  /**
   * {@inheritdoc}
   *
   * @todo Make cacheable in https://www.drupal.org/node/2483181
   */
  public function getCacheMaxAge() {
    return 0;
  }
}
