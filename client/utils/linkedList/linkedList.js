import Node from "./node.js";

class LinkedList {
    constructor(){
        this.head = null,
        this.size = 0
    }

    // precisa de um iterator pra navvegar pros dois lados

    add(data) {
        const newNode = new Node(data);
        // prenche o primeiro nó
        if (this.head == null){
            this.head = newNode;
        } else { // preenche os proximos
            let current = this.head;
            while (current.next !== null){ //se o proxim o nao estiver vazio o atual é o proximo
                current = current.next;
            } // se estiver vazio
            current.next = newNode; // o atual é o novo
            current.next.previous = current; // o passado do futuro é o atual
        }
        this.size++;
    }

    removeByItem(data) {
        // se for o primeiro objeto
        if (this.head === null) return;
        
        // se for a primeira e tiver data
        if (this.head === data) {
            this.head = this.head.next;
            this.head.previous = null;
            this.size--;
            return;
        }

        let current = this.head; // o atual é o 0
        while (current.next !== null) { // enquanto o proximo nao for vazia
            if (current.next.data === data) { // o proximo (1) tem a data que a gente quer deletar
                current.next = current.next.next; // então o proximo é igual ao depois dele (2);
                current.next.next.previous = current; // e oanterior depois do proximo virou o atual (0)
                this.size--;
                return; // 0-1-2 -> 0-X-2 -> 0-2 (nao é um problema pois ainda nao tem index);
            }
            current = current.next;
        }
    }

    get(index) {
        index = Number.parseInt(index);
        if (!this.isElementIndex(index)) {
            throw new Error("Erro: este index é maior que a quantidade de elementos na lista ou menor que 0");
        }

        let currentIndex = 0; // index atual
        let current = this.head; // item atual
        while (currentIndex !== index) { // enquanto o index atual não for = ao index de busca
            current = current.next; // vai para o proximo elemento
            currentIndex++; // adiciona um ao index atual
        }

        let dataIndexNode = current.data;
        return dataIndexNode;
    }
    
    indexOf(data){
        if (this.head === null) {
            throw new Error("Erro: esta lista não tem nenhum elemento");
        } else if (this.head.data === data) {
            return 0;
        }

        let index = 0; // index
        let current = this.head; // item atual
        while (current.data !== data) { // enquanto o index atual não for = ao index de busca
            current = current.next; // vai para o proximo elemento
            index++; // adiciona um ao index atual
        }


        if (!this.isElementIndex(index)){
            throw new Error("Erro: a lista foi completamente percorrida e o index não foi achado");
        }

        return index;
    }

    isElementIndex(index){
        return index >= 0 && index < this.size;
    }

    isPositionIndex(index){
        return index >= 0 && index <= this.size;
    }

    print() {
        let current = this.head;
        while (current !== null) {
          console.table(current.data);
          current = current.next;
        }
    }
}

export default LinkedList;