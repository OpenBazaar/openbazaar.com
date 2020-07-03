<div class="Discover-Header-Bar">
  <div class="Discover-Header-Bar-Inner">
    <div class="Search-Bar clearfix">
      <form action="javascript:void();" onsubmit="location.href='/discover/results?q='+encodeURIComponent(document.getElementById('frm-search-input').value);">
      <div class="Search-Bar-Box-Left">
        <div style="background-image: url('<?=asset_url()?>img/icon-ob1-border.png'); height: 26px; width: 26px;background-size: contain; position: absolute;margin-top: 8px;margin-left: 8px;"></div>
        <input id="frm-search-input" type="text" class="Search-OB1" placeholder="Search" value="<?=(isset($q))? $q :"";?>" style="border-top-right-radius: 0;" />
      </div>
      <button class="Search-Button" type="submit">
        <div class="Search">Search</div>
      </button>
      </form>
    </div>
    
    <div class="Suggestions-Box clearfix">
      <div class="lbl clearfix">Suggestions:</div> 
      <a href="/discover/results?q=books">Books</a> 
      <a href="/discover/results?q=art">Art</a> 
      <a href="/discover/results?q=clothing">Clothing</a>
      <a href="/discover/results?q=bitcoin">Bitcoin</a> 
      <a href="/discover/results?q=crypto">Crypto</a> 
      <a href="/discover/results?q=handmade">Handmade</a> 
      <a href="/discover/results?q=health">Health</a> 
      <a href="/discover/results?q=toys">Toys</a> 
      <a href="/discover/results?q=electronics">Electronics</a> 
      <a href="/discover/results?q=games">Games</a> 
      <a href="/discover/results?q=music">Music</a>  
    </div>
  </div>  
</div>
