<script setup>
import useOrcamentos from '../../composables/orcamentos';
import { onMounted } from 'vue';

const { orcamentos, getOrcamentos, destroyOrcamento } = useOrcamentos();

onMounted(() => getOrcamentos());

</script>

<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{ name: 'OrcamentoCreate' }"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Novo Orçamento</RouterLink>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nome Cliente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome Vendedor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descricao
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Valor Orcado
                        </th>

                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="orcamento in orcamentos" :key="orcamento.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">{{ orcamento.nome_cliente }}</td>
                        <td class="py-4 px-6">{{ orcamento.nome_vendedor }}</td>
                        <td class="py-4 px-6">{{ orcamento.descricao }}</td>
                        <td class="py-4 px-6">{{ orcamento.valor_orcado }}</td>

                        <td class="py-4 px-6 space-x-2">
                            <RouterLink :to="{ name: 'OrcamentoEdit', params: { id: orcamento.id } }"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">
                                Editar</RouterLink>
                            <button
                            @click="destroyOrcamento(orcamento.id)"
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">Deletar</button>

                        </td>


                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
