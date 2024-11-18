class UserData {
    constructor (id, email, nome, foto) {
        this.id = id,
        this.email = email,
        this.nome = nome,
        this.foto = foto
    }

    toJson(){
        return JSON.stringify(this);
    }
    
}

export default UserData;