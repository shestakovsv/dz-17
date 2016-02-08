

{if ($announcements_tr->private == 0)}    
    <tr class="success">
    {else}
    <tr class="">   
    {/if} 
    <td class="{$id_tr}">{$id_tr}</td>
{*    <td>{$announcements_tr->id}</td>*}
    <td><a href="{$Location}?id={$announcements_tr->id}">{$announcements_tr->title}</a></td>
    <td>{$announcements_tr->description}</td>
    <td>{$announcements_tr->price}    руб.</td>
    <td><button type="button" class="btn btn-default">Удалить</button></td>
</tr>          
