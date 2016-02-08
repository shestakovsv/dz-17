<?php /* Smarty version 2.6.28, created on 2016-02-08 17:42:00
         compiled from tr.tpl */ ?>


<?php if (( $this->_tpl_vars['announcements_tr']->private == 0 )): ?>    
    <tr class="success">
    <?php else: ?>
    <tr class="">   
    <?php endif; ?> 
    <td class="<?php echo $this->_tpl_vars['id_tr']; ?>
"><?php echo $this->_tpl_vars['id_tr']; ?>
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