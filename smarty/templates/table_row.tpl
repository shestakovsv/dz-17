
{if (!empty($Announcements))}    
    {foreach from=$Announcements key=id item=value} 
        <tr><td>{$value->id}</td>
            <td><a href="{$Location}?id={$value->id}" >{$value->title}</a></td>
            <td>{$value->description}</td>
            <td>{$value->price}руб.</td>
            <td><a href="{$Location}?id_del={$value->id}" >Удалить</a></td>
        </tr>          
    {/foreach}
{/if}