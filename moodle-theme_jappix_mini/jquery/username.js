function GetUser(username_var) {
  //Get the username from Moodle
   var externalUserID = username_var;
  //Show username in HTML form
    document.GetUserForm.txtusername.value = externalUserID;
}
