<?php if ($detect->isMobile()): ?>

    <div class="alert alert-warning" id="desktop-warning">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        Welcome to the <span style="font-weight:bold;">beta version</span> of Open Knowledge Maps.
        <a href="#info_modal" data-type="text" data-toggle="modal" class="underline" style="font-weight:bold;">More info on this map</a>. 
        Note: the map isn't optimized for mobile yet, you may encounter some rough edges.

    </div>

<?php else: ?>

    <div class="alert alert-warning" id="desktop-warning">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        Welcome to the <span style="font-weight:bold;">beta version</span> of Open Knowledge Maps. For more information on this map, please 
        <a href="#info_modal" data-type="text" data-toggle="modal" class="underline" style="font-weight:bold;">click here</a>.

    </div>

<?php endif ?>

