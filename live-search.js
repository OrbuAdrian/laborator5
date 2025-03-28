const searchInput=document.getElementById('inputtext');
const searchResult=document.getElementById('inputtext');
const searchStatus=document.getElementById('inputtext');

let debounceTimer;
searchInput.addEventListener('input',function(e){
    const searchTerm=e.target.value.trim();
    clearTimeout(debounceTimer);
    if(searchTerm===''){
        searchResult.innerHTML='';
        searchStatus.textContent=' ';
        return;
    }
    searchStatus.textContent='Searching...';
    
    debounceTimer=setTimeout(() => {
        if(searchTerm.length>=2 ){
            fetchCountries(searchTerm)
        }
        else{
            searchStatus.textContent='Please enter at least 2 characters';
            searchResults.innerHTML='';
        }
    })

})
