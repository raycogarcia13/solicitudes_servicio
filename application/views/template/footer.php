</div>
</div>
<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<script src="<?= base_url() ?>resources/template/js/vendors.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>resources/template/js/scripts.bundle.js" type="text/javascript"></script>

<?php
if(isset($js))
    foreach($js as $item)
        echo "<script src='".base_url()."resources/".$item."'></script>\n";
?>
<!-- <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script> -->

<!-- <script src="assets/app/js/dashboard.js" type="text/javascript"></script> -->
</body>

</html> 