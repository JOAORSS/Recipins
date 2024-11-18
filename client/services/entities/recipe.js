class RecipeData {
    constructor(id, nome, descricao, ingredientes, tempo, preparo, foto, data){
        this.id = id,
        this.nome = nome,
        this.descricao = descricao,
        this.ingredientes = ingredientes,
        this.tempo = tempo,
        this.preparo = preparo,
        this.foto = foto,
        this.data = data
    }

    static parse(json) {
        const obj = typeof json === "string" ? JSON.parse(json) : json;
        return new RecipeData(obj.id, obj.nome, obj.descricao, obj.ingredientes, obj.tempo, obj.preparo, obj.foto, obj.data);
    }

    toJson(){
        return JSON.stringify(this);
    }

    printIndex(index) {

        let receitaShart = `
            <a id="0${this.id}" data-index="${index}" href="pages/receita.php?id=${this.id}" class="main__shart">
                <div class="main__shart__img">
                    <img id="capa" src=${this.foto}>
                    <h2 id="titulo" class="main__shart__img__titulo">${this.nome}</h2>
                </div>
                <p id="descricao" class="main__shart__paragrafo">${this.descricao}</p>
                <footer class="main__shart__footer">
                    <div class="main__shart__footer__mark">
                        <img id="bookmark" src="assets/bookmark.svg" class="main__shart__footer__mark__book">
                        <img id="share" src="assets/share.svg" alt="compartilhar">
                    </div>
                    <h2 id="tempo" class="main__shart__footer__tempo">${this.tempo}min</h2>
                </footer>
            </a>
        `;

        document.getElementById(1).insertAdjacentHTML("beforeend", receitaShart);
    }

    printPage() {

        let receitaPagina = `
                    <div class="main__receita">
            <div class="main__receita__detalhes">
            <h1>${this.nome}</h1>
            <p>Tempo de preparo: ${this.tempo}</p>
            <p>${this.descricao}</p>
            <h3>Ingredientes</h3>
            <p>
                ${this.ingredientes}
            </p>
            <h3>Modo de preparo:</h3>
            <p>
                ${this.preparo}
            </p>
        </div>
        <div class="main__receita__sobre">
            <img src="${this.foto}">
            <div class="main__receita__sobre__mark">
                <img id="bookmark" src="../assets/bookmark.svg" class="main__shart__footer__mark__book">
                <img id="share" src="../assets/share.svg" alt="compartilhar">
            </div>
            <div class="main__receita__sobre__chat">
                <h3><strong>Comentários</strong></h3>
                <div class="main__receita__sobre__chat__comment">
                    <h4>João Vitor Raenke dos Santos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>

                    <h3>Sem comentários</h3>
                </div>
            </div>
        </div>
        </div>
        `

        document.getElementById("recipeHere").insertAdjacentHTML("afterbegin", receitaPagina);

    }
}

export default RecipeData;