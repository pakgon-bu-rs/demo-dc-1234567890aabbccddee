  <script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Tab1</a></li>
    <li><a href="#tabs-2">Tab2</a></li>
    <li><a href="#tabs-3">Tab3</a></li>
  </ul>
  <div id="tabs-1">
    Data in tab1
  </div>
  <div id="tabs-2">
    Data in tab2
  </div>
  <div id="tabs-3">
    Data in tab3
  </div>
</div>

<?php
    if(!empty($data)){ pr($data); }

    echo $this->Paginator->counter(
        'Page {:page} of {:pages}, showing {:current} records out of
         {:count} total, starting on record {:start}, ending on {:end}'
    );

    // Shows the page numbers
    echo $this->Paginator->numbers();

    // Shows the next and previous links
    echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled'));
    echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled'));

    // prints X of Y, where X is current page and Y is number of pages
    echo $this->Paginator->counter();

    pr($this->Paginator->params());
?>