  <script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">General Info</a></li>
    <li><a href="#tabs-2">1</a></li>
    <li><a href="#tabs-3">2</a></li>
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
    if(!empty($data)){
        pr($data);
    }

    $tmp = array(0);

    echo "case1 " . empty($tmp) . "<br />";
    echo "case2 " . empty($tmp[0]) . "<br />";
    ?>