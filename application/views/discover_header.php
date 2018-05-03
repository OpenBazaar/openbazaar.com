<div class="Discover-Header-Bar">
  <div class="Discover-Header-Bar-Inner">
    <div class="Search-Bar clearfix">
      <form action="javascript:void();" onsubmit="location.href='/discover/results?term='+encodeURIComponent(document.getElementById('frm-search-input').value);">
      <div class="Search-Bar-Box-Left">
        <div style="background-image: url('<?=asset_url()?>img/icon-ob1-border.png'); height: 26px; width: 26px;background-size: contain; position: absolute;margin-top: 8px;margin-left: 8px;"></div>
        <input id="frm-search-input" type="text" class="Search-OB1" placeholder="Search" value="<?=(isset($term))? $term :"";?>" style="border-top-right-radius: 0;" />
        
      </div>
      <button class="Search-Button" type="submit">
        <div class="Search">Search</div>
      </button>
      </form>
    </div>
    
    <div class="Suggestions-Box clearfix">
      <div class="lbl clearfix">Suggestions:</div> 
      <a href="/discover/results?term=books">Books</a> 
      <a href="/discover/results?term=art">Art</a> 
      <a href="/discover/results?term=clothing">Clothing</a>
      <a href="/discover/results?term=bitcoin">Bitcoin</a> 
      <a href="/discover/results?term=crypto">Crypto</a> 
      <a href="/discover/results?term=handmade">Handmade</a> 
      <a href="/discover/results?term=health">Health</a> 
      <a href="/discover/results?term=toys">Toys</a> 
      <a href="/discover/results?term=electronics">Electronics</a> 
      <a href="/discover/results?term=games">Games</a> 
      <a href="/discover/results?term=music">Music</a>  
    </div>
  </div>  
</div>
