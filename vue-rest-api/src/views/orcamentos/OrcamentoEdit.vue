<script setup>
import useOrcamentos from '../../composables/orcamentos';
import { onMounted } from 'vue';

const { orcamento, getOrcamento, updateOrcamento, errors} = useOrcamentos();

const props = defineProps({
  id:{
    required: true,
    type: String
  }
})

onMounted(() => getOrcamento(props.id))

</script>

<template>
  <div class="pt-14">
    <form class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="updateOrcamento($route.params.id)">
      <div class="space-y-6">
        <div class="mb-6">
          <label for="nome_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do
            Cliente</label>
          <input type="text" id="nome_cliente" v-model="orcamento.nome_cliente"
            class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.nome_cliente">
            <span class="text-sm text-red-400">{{ errors.nome_cliente[0] }}</span>
          </div>
        </div>

        <div class="mb-6">
          <label for="nome_vendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do
            Vendedor</label>
          <input type="text" id="nome_vendedor" v-model="orcamento.nome_vendedor"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.nome_vendedor">
            <span class="text-sm text-red-400">{{ errors.nome_vendedor[0] }}</span>
          </div>
        </div>

        <div class="mb-6">
          <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descricao</label>
          <input type="text" id="descricao" v-model="orcamento.descricao"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.descricao">
            <span class="text-sm text-red-400">{{ errors.descricao[0] }}</span>
          </div>
        </div>

        <div class="mb-6">
          <label for="valor_orcado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor do
            Orçamento</label>
          <input type="number" id="valor_orcado" v-model="orcamento.valor_orcado"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.valor_orcado">
            <span class="text-sm text-red-400">{{ errors.valor_orcado[0] }}</span>
          </div>
        </div>

        <div class="mt-4">
          <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Atualizar
            Orçamento</button>
        </div>
      </div>

    </form>
  </div>
</template>
