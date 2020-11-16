function validateForm(gameTitle, gameDescription, gameLink, gameImage, gameTags){
  if(gameTitle.value.length == 0){
    alert("Game Title can't be 0 characters!");
    return false;
  }
  if(gameDescription.value.length > 3000){
    alert("The description can only be a max of 3000 characters!");
    return false;
  }
  if(gameLink.value.length > 300){
    alert("The link can only be a max of 300 characters!");
    return false;
  }
  if(gameImage.value.length > 300){
    alert("The game image can only be a max of 300 characters!");
    return false;
  }
  if(gameTags.value.length > 300){
    alert("The game tags can only be a max of 300 characters!");
    return false;
  }
  return true;
}
