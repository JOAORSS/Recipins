import RecipeData from "../services/entities/recipe.js";
import { getRecipeData } from "../services/usecases/get_recipes_data_usecases.js";

const receitaJson = JSON.parse(localStorage.getItem('receita'));
localStorage.removeItem("receita");

if (receitaJson !== null) {
    const receita = RecipeData.parse(receitaJson);
    receita.printPage();
} else {
    const params = new URLSearchParams(document.location.search);
    const receitaJson = await getRecipeData(params.get("id"));
    const receita = RecipeData.parse(receitaJson);
    receita.printPage();
}