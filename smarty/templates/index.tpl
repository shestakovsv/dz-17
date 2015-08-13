
{* форма ввода вывода объявлений *}
<form  method="post">
    <br>
    <label><input type = "radio" checked = "" value = "1" name = "private">Частное лицо</label>
    <label><input type = "radio" {$checked}  value = "0" name = "private">Компания</label>
    <br>
    <label><b>Контактное лицо</b></label> <input type="text" maxlength="40" value="{$manager}" name="manager">
    <br> 
    <label>Электронная почта</label><input type="text" value="{$email}" name="email">
    <br>

    {if $allow_mails eq 1}
        <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" CHECKED class="form-input-checkbox">
            <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div>
        {else}
    <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails"  class="form-input-checkbox">
        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div> 
    {/if}

<br>
<label><b>Ваше имя </b></label><input type="text" maxlength="40"  value="{$seller_name}" name="seller_name">
<br>  

<label>Номер телефона </label><input type="text" value="{$phone}" name="phone">
<br>
<label>Город</label> 
<select title="Выберите Ваш город"  name="location_id">
    <option >-- Города --</option>
    {foreach from=$location key=value item=city}
        {if $city eq $location_id}
            {assign var=selected value='selected=""'}            
        {else}
            {assign var=selected value=''}
        {/if}
        <option data-coords=",," {$selected}  value="{$value}"  >{$city} </option>
    {/foreach}
    <option id="select-region" value="0">Выбрать другой...</option> </select> 
<br>

<label>Категория</label> 
<select title="Выберите категорию объявления"  name="category_id" > 
    <option >-- категории --</option>
    <optgroup label="Транспорт">
        {foreach from=$category key=value item=category_typ}
            {if $category_typ eq $category_id}
                {assign var=selected value='selected=""'}
            {else}
                {assign var=selected value=''}
            {/if}
            <option data-coords=",," {$selected}  value="{$value}"  >{$category_typ}</option>            
        {/foreach}
    </optgroup></select>

<br>
<label>Название объявления</label> <input type="text" maxlength="50" value="{$title}" name="title">
<br>
<label>Описание объявления</label><input type="text" maxlength="3000" value="{$description}" name="description">
<br>
<label>Цена</label> <input type="text" maxlength="9" value="{$price}" name="price"><span>руб.</span>
<br><br>
<input type="submit" value="Сохранить изменения"  name="main_form_submit" class="vas-submit-input" > 
</form>

<br><br>

{* Вывод объявлений в списке *}

{if (!empty($Announcements))}
    {foreach from=$Announcements key=id item=value}      
        <a href="{$Location}?id={$id}" >{$Announcements.$id.title}</a>        
        |  Цена:   {$Announcements.$id.price}    руб.  |  
        <a href="{$Location}?id_del={$id}" >Удалить</a>
        <br>       
    {/foreach}
{/if}