/**
 * Created by shaun on 6/2/17.
 */

(function($) {

  function fixHeights() {
    var content = $('#content');
    var leftSidebar = $('#left-sidebar');

    var contentHeight = content.height();
    var leftSidebarHeight = leftSidebar.height();
    var windowHeight = $(window).height();
    var headerHeight = $('#header').height();
    var footerHeight = $('.footer').height();
    var toolbarHeight = $('#toolbar-administration').size() ? 78 : 0;
    var minContentHeight = windowHeight - toolbarHeight - headerHeight - footerHeight;

    // Get the desired outer height of the left sidebar and the content.
    var height = Math.max(contentHeight, leftSidebarHeight, minContentHeight);

    // Set the heights.
    leftSidebar.height(height);
    content.height(height);
  }

  $(fixHeights);

})(jQuery);
