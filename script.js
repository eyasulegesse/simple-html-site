document.getElementById('search-input').addEventListener('keyup', async (e) => {
  /* Getting the value of the input field. */
  var str = document.getElementById('search-input').value;
  /* Checking if the length of the string is 0, if it is, it will clear the results and hide the result
 title. If it is not, it will send the request to the server. */
  if (str.length === 0) {
    document.querySelector('#results').innerHTML = '';
    document.querySelector('.resulttitle').style.display = 'none';
    return;
  } else {
    try {
      /* Sending a request to the server and getting the response. */
      let xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.querySelector('.resulttitle').style.display = 'block';
          document.querySelector('#results').innerHTML = this.responseText;
        }
      };

      xmlHttp.open('GET', 'php/public/index.php?q=' + str, true);
      xmlHttp.send();
    } catch (err) {
      console.log(err);
    }
  }
});
