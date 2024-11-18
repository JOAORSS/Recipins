import { getAllRecipesData } from "../services/usecases/get_recipes_data_usecases.js";
import LinkedList from "../utils/linkedList/linkedList.js";

const listaReceitas = new LinkedList();
const main = document.getElementById("main");

await getAllRecipesData(listaReceitas);

for (let i = 0; i < listaReceitas.size; i++) {
    const receita = await listaReceitas.get(i);

    receita.printIndex(i);
}



main.addEventListener("click", (e) => {
    e.preventDefault();

    const targetElement = e.target.closest(".main__shart");
    
    if (targetElement) {
        const id = targetElement.getAttribute("data-index");
        const url = targetElement.getAttribute("href");
        const targetRecipe = listaReceitas.get(id);

        console.table(targetRecipe);

        localStorage.setItem('receita', targetRecipe.toJson());

        window.location.href = url;
    }

})

