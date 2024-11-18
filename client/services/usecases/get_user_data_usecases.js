import UserData from "../entities/user.js";

async function getUserData (id) {
    const jsonUser = await fetch(`http://localhost/Recipins/server/index.php/usuario?id=${id}`);
    const data = await jsonUser.json();
    const userData = new UserData(data["usuario_id"], data["nome"], data["email"], data["foto"]);
    
    return userData;
}

export {getUserData};