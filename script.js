

async function getMessages(){
  var url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/helper.php";
  
  var myId = document.getElementById('groupID').value;
  var messsage = document.getElementById('message').value;
  
  //console.log(myId);
  var messageRequest = {
    id: myId
  };
  
  var request = new Request(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify(messageRequest)
  })
  
  fetch(request).then(async function(data) {
    const result = await data.json();
    console.log(result);
    message.value = result;
  })
  
}

async function sendMessage(){
  var url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/helper2.php";
  
  var myId = document.getElementById('groupID').value;
  var message2 = document.getElementById('message2').value;
  
  console.log(message2);
  var messageRequest = {
    id: myId,
    message: message2
  };
  
  var request = new Request(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify(messageRequest)
  })
  
  fetch(request).then(async function(data) {
    const result = await data.json();
    console.log(result);
    message2.value = result;
  })
}

async function main(){
  getMessages();
  sendMessage();
}

//setInterval(getMessages(), 5000);