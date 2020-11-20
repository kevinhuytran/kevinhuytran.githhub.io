function validateForm(gameTitle, gameDesc, gameTags) {
    let titleValidation = /^[a-zA-Z\s]+$/;
    if (gameTitle.value.length == 0 && gameTitle.value.match(titleValidation)) {
        alert("Game Title can't be 0 characters!");
        return false;
    }
    if (gameDesc.value.length > 5000) {
        alert("The description can only be a max of 5000 characters!");
        return false;
    }
    if (gameTags.value.length > 300) {
        alert("The game tags can only be a max of 300 characters!");
        return false;
    }
    return true;
}

function ValidateSize(file) {
    let FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 1) {
        alert('File size exceeds 1 MB');
        $(file).val('');
    }
}