function myRole(element, UserID) {

    var role =  element.value;
    
    if(role == 'ROLE_USER'){
        window.location.href = "admin.php?role=ROLE_ADMIN&userID="+UserID;
    }
    if(role == 'ROLE_ADMIN'){
        window.location.href = "admin.php?role=ROLE_USER&userID="+UserID;
    }
}

function myRole2(element, UserID) {

    var role =  element.value;
    
    if(role == 'ROLE_USER'){
        window.location.href = "test2.php?role=ROLE_ADMIN&userID="+UserID;
    }
    if(role == 'ROLE_ADMIN'){
        window.location.href = "test2.php?role=ROLE_USER&userID="+UserID;
    }
}
