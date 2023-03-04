document.getElementById('search-input').addEventListener('keyup', async (e) => {
  var str = document.getElementById('search-input').value;
  if (str.length === 0) {
    document.querySelector('#results').innerHTML = '';
    document.querySelector('.resulttitle').style.display = 'none';
    return;
  } else {
    try {
      let xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.querySelector('.resulttitle').style.display = 'block';
          document.querySelector('#results').innerHTML = this.responseText;
        }
      };
      console.log(str);
      xmlHttp.open('GET', 'php/public/index.php?q=' + str, true);
      xmlHttp.send();
    } catch (err) {
      console.log(err);
    }
  }
  // Search comments
  // Use this API: https://jsonplaceholder.typicode.com/comments?postId=3
  // Display the results in the UI

  // Things to look out for
  // ---
  // Use es6
  // Error handling
});
