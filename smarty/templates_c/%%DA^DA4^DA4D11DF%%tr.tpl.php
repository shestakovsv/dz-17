<?php /* Smarty version 2.6.28, created on 2016-01-11 14:47:36
         compiled from tr.tpl */ ?>



<?php if (( $this->_tpl_vars['announcements1']->private == 0 )): ?>    
    <tr class="success">
    <?php else: ?>
    <tr>   
    <?php endif; ?> 
        <td><?php echo $this->_tpl_vars['announcements1']->id; ?>
</td>
        <td><a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['announcements1']->id; ?>
"><?php echo $this->_tpl_vars['announcements1']->title; ?>
</a></td>
    <td><?php echo $this->_tpl_vars['announcements1']->description; ?>
</td>
    <td><?php echo $this->_tpl_vars['announcements1']->price; ?>
    руб.</td>
    <td><button type="button" class="btn btn-default">Удалить</button></td>
    </tr>          