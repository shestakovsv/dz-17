<?php /* Smarty version 2.6.28, created on 2016-01-17 14:11:10
         compiled from tr.tpl */ ?>


<?php if (( $this->_tpl_vars['announcements_tr']->private == 0 )): ?>    
    <tr class="success">
    <?php else: ?>
    <tr>   
    <?php endif; ?> 
    <td><?php echo $this->_tpl_vars['id_tr'][0]['id']; ?>
</td>
    <td><a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['announcements_tr']->id; ?>
"><?php echo $this->_tpl_vars['announcements_tr']->title; ?>
</a></td>
    <td><?php echo $this->_tpl_vars['announcements_tr']->description; ?>
</td>
    <td><?php echo $this->_tpl_vars['announcements_tr']->price; ?>
    руб.</td>
    <td><button type="button" class="btn btn-default">Удалить</button></td>
</tr>          