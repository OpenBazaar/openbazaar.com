<div class="Discover-Header-Bar">
  <div class="Discover-Header-Bar-Inner">
  <div class="Search-Bar clearfix">
    <form action="javascript:void();" onsubmit="location.href='/discover/results/'+document.getElementById('frm-search-input').value;">
    <div class="Search-Bar-Box-Left">
      <div class="Rectangle-6">
        <img src="https://ob1.io/images/logo.png" class="logo"/>
      </div>
      <input id="frm-search-input" type="text" class="Search-OB1" placeholder="Search..." value="<?=(isset($term))? $term :"";?>" style="border-top-right-radius: 0;" />
      
    </div>
    <button class="Search-Button" type="submit">
      <div class="Search">Search</div>
    </button>
    </form>
  </div>
  
  <div class="Suggestions-Box clearfix">
    <div class="lbl clearfix">Suggestions:</div> <a href="/discover/results/electronics">Electronics</a> <a href="/discover/results/games">Games</a> <a href="/discover/results/books">Books</a> <a href="/discover/results/movies">Movies</a> <a href="/discover/results/health">Health</a> <a href="/discover/results/toys">Toys</a> <a href="/discover/results/music">Music</a> <a href="/discover/results/clothing">Clothing</a> <a href="/discover/results/handmade">Handmade</a> <a href="/discover/results/bitcoin">Bitcoin</a> <a href="/discover/results/crypto">Crypto</a> 
  </div>
  
  </div>  
</div>