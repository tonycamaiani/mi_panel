<div class='paging'>
<?php
echo $paginator->prev('«', array(), null);
echo '&nbsp;' . $paginator->numbers(array('separator' => ' | ')) . '&nbsp;';
echo $paginator->next('»', array(), null);
?>
</div>