import RecipeData from "../entities/recipe.js";

async function getRecipeData (id) {

    const receita = await JSON.parse(localStorage.getItem('receita'));
    var recipeData = receita;
    console.log(recipeData);

    if (!receita) {
        const jsonRecipe = await fetch(`http://localhost/Recipins/server/index.php/receita?id=${id}`);
        const data = await jsonRecipe.json();
        recipeData = new RecipeData(data["receita_id"], data["nome"], data["descricao"], data["ingredientes"], data["tempo"], data["preparo"], data["foto"], data["data"]);
    }
    
    return recipeData;
    
}

//colocar um limite de quanto ele pode puxar pra caso se escalasse muit não ficar absurdo
async function getAllRecipesData (ListaReceita) {
    const jsonRecipe = await fetch(`http://localhost/Recipins/server/index.php/receitas`);
    const data = await jsonRecipe.json();

    data.forEach(element => {
        const recipeData = new RecipeData(element["receita_id"], element["nome"], element["descricao"], element["ingredientes"], element["tempo"], element["preparo"], element["foto"], element["data"]);
        ListaReceita.add(recipeData);
    });
    
    return;
}

export {getRecipeData, getAllRecipesData};