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

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['block_mode'] = $form_state->getValue('book_block_mode');
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
  protected function itemHtml($nid, $bid) {
    // Get the page object and check it's included.
    $page = $this->pages[$nid];
    if (!$page->include) {
      return '';
    }

    // Get the current nid.
    $node = \Drupal::routeMatch()->getParameter('node');
    $current_nid = (bool) $node ? $node->id() : 0;

    $html = '';

    if ($page->status) {
      // Get alias.
      $alias = \Drupal::service('path.alias_manager')->getAliasByPath("/node/$nid");
      // Published page.
      $html .= "<a href='$alias' class='";
      if ($nid == $bid) {
        $html .= " top-page";
      }
      if ($nid == $current_nid) {
        $html .= " current-page";
      }
      $html .= "'>". $page->title . "</a>\n";
    }
    else {
      // Unpublished page.
      $html .= "<span class='unpublished-page'>{$page->title}</span>";
    }

    // Children.
    $list_started = FALSE;
    foreach ($this->pages as $page2) {
      if ($page2->pid == $nid && $page2->include) {
        if (!$list_started) {
          $html .= "<ul>\n";
          $list_started = TRUE;
        }
        $html .= "<li>" . $this->itemHtml($page2->nid, $bid) . "</li>\n";
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
    $bid = 9;
    $this->pages = [];
    $rs = db_query("
      select b.nid, b.pid, n.title, n.status, f.field_include_in_contents_value as include
      from book b
      left join node_field_data n on b.nid = n.nid
      left join node__field_include_in_contents f on n.nid = f.entity_id
      order by pid, weight
    ");
    foreach ($rs as $rec) {
      $this->pages[$rec->nid] = $rec;
    }
    return [
      '#markup' => $this->itemHtml($bid, $bid),
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
