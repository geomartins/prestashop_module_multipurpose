{extends file='page.tpl'}

{block name="page_content_container"}
  <ul>
      <li>{l s='Number of products' mod='multipurpose'} {$nb_product} </li>

      <li>
         Categories
         <ul>
               <li>
                  {foreach from=$categories item=cat}
                        <li> {$cat['name']}</li>
                  {/foreach}
               </li>
         </ul>
      </li>

      <li> {$shop_name}</li>
      <li> {$manufacturer['name']}</li>
  </ul>

  
{/block}