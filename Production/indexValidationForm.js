function validateForm(playerInGame,playerName,playerDescription,playerSettings,playerLink,playerImage,playerTags){
  let playerInGameValidation = /^[0-9a-zA-Z]+$/;
  let nameValidation = /^[a-zA-Z\s]+$/;
  if(playerInGame.value.length == 0 || playerName.value.length == 0){
    alert("In-Game and Actual Name can't be 0 characters long!");
    return false;
  }
  if(playerInGame.value.length > 30 || playerName.value.length > 30){
    alert("In-Game and Actual Name must be less than 30 characters long!");
    return false;
  }
  if(!playerInGame.value.match(playerInGameValidation)){
    alert("In-Game name must consist of only letters and numbers!");
    return false;
  }
  if(!playerName.value.match(nameValidation)){
    alert("Actual name must consist of only letters and spaces!");
    return false;
  }
  if(playerDescription.value.length > 3000){
    alert("The description can only be a max of 3000 characters!");
    return false;
  }
  if(playerSettings.value.length > 1000){
    alert("The setting can only be a max of 1000 cahracters!");
    return false;
  }
  if(playerLink.value.length > 300){
    alert("The link can only be a max of 300 characters!");
    return false;
  }
  if(playerImage.value.length > 300){
    alert("The player image can only be a max of 300 characters");
    return false;
  }
  if(playerTags.value.length > 300){
    alert("The player tags can only be a max of 300 characters");
    return false;
  }
  return true;
}
