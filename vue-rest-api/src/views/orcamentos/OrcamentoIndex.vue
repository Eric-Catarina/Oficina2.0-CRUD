<script setup>
import useOrcamentos from '../../composables/orcamentos';
import { onMounted } from 'vue';
import dayjs from "dayjs";
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';
const { orcamentos,orcamentosVisiveis, getOrcamentos, destroyOrcamento } = useOrcamentos();
let myDateRangePicker

onMounted(() => {
    getOrcamentos()

    const dateRangePickerEl = document.getElementById('daterangepicker');
    myDateRangePicker = new DateRangePicker(dateRangePickerEl, {
        // options
    });
   
});
let ordemEhCrescente = false     // decresecente e crescente

function filtraPorData(){
    let dataInicial = dayjs(myDateRangePicker.dates[0]) 
    let dataFinal   = dayjs(myDateRangePicker.dates[1]) 

    orcamentosVisiveis.value = orcamentos.value.filter(function(item) {
        return (item.created_at.isAfter(dataInicial) && item.created_at.isBefore(dataFinal));
    });

}

function sortString(propriedade) {
    if (!ordemEhCrescente) {
        orcamentosVisiveis.value.sort(function (a, b) {
            return b[propriedade].localeCompare(a[propriedade], { sensitivity: 'base' });
        })
    }
    else {
        orcamentosVisiveis.value.sort(function (a, b) {
            return a[propriedade].localeCompare(b[propriedade], { sensitivity: 'base' });
        })
    }
    ordemEhCrescente = !ordemEhCrescente
}


const tornaDataLegivel = (data) => {
    let dataLegivel = data.format('DD/MM/YYYY HH:mm')
    return dataLegivel
}

const sortDatas = () => {
    if (!ordemEhCrescente) {
        orcamentosVisiveis.value.sort(function (a, b) {
            return a.created_at.isBefore(b.created_at)
        });
    }
    else {
        orcamentosVisiveis.value.sort(function (a, b) {
            return a.created_at.isAfter(b.created_at)
        });
    }
    ordemEhCrescente = !ordemEhCrescente
}

</script>

<template>
    <div class="mt-12">
        <div class="flex justify-end mb-2">
            <RouterLink :to="{ name: 'OrcamentoCreate' }"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Novo Orçamento</RouterLink>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4">

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items">
                </div>


                <div class="flex items-end">
                    <div id="daterangepicker" class="flex items-center">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="start" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="end" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>
                    </div>
                    <div>
                        <button @click="filtraPorData()" class="ml-2 px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Filtrar</button>
                    </div>

                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th @click="sortString('nome_cliente')" scope="col" class="px-6 py-3">
                            Nome Cliente
                        </th>
                        <th @click="sortString('nome_vendedor')" scope="col" class="px-6 py-3">
                            Nome Vendedor
                        </th>
                        <th @click="sortString('descricao')" scope="col" class="px-6 py-3">
                            Descricao
                        </th>
                        <th @click="sortString('valor_orcado')" scope="col" class="px-6 py-3">
                            Valor Orcado
                        </th>
                        <th @click="sortDatas()" scope="col" class="px-6 py-3">
                            Data
                        </th>

                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="orcamento in orcamentosVisiveis" :key="orcamento.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                            orcamento.nome_cliente
                        }}</th>
                        <td class="py-4 px-6">{{ orcamento.nome_vendedor }}</td>
                        <td class="py-4 px-6">{{ orcamento.descricao }}</td>
                        <td class="py-4 px-6">{{ orcamento.valor_orcado }}</td>
                        <td class="py-4 px-6">{{ tornaDataLegivel(orcamento.created_at ) }}</td>
                        <td class="py-4 px-6 space-x-2">
                            <RouterLink :to="{ name: 'OrcamentoEdit', params: { id: orcamento.id } }"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">
                                Editar</RouterLink>
                            <button @click="destroyOrcamento(orcamento.id)"
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">Deletar</button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
