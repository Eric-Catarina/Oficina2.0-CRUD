import { ref } from "vue";
import axios from "axios";
import { useRouter } from 'vue-router'
import dayjs from "dayjs";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";

export default function useOrcamentos(){

    const orcamentos = ref([]);
    const orcamento = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getOrcamentos = async () => {
        const response = await axios.get("orcamento")
        orcamentos.value = response.data.data;

        orcamentos.value.forEach(element => {
            element.created_at = dayjs(element.created_at.slice(0,10)).locale('pt-br')
            console.log(element.created_at)
        });
       
    };

    const getOrcamento = async (id) => {
        const response = await axios.get("orcamento/" + id)
        orcamento.value = response.data.data;
    };

    const storeOrcamento = async (data) => {
        try{
            await axios.post("orcamento", data);
            await router.push({name: "OrcamentoIndex"});
        }
        catch(error){
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    };

    const updateOrcamento = async (id) => {
        try{
            await axios.put("orcamento/" + id, orcamento.value);
            await router.push({name: "OrcamentoIndex"});
        }
        catch(error){
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    };

    const destroyOrcamento = async (id) => {
        if(!window.confirm("Você tem Certeza?")){
            return
        }
        await axios.delete("orcamento/" + id);
        await getOrcamentos();
    };

    return {
        orcamento,
        orcamentos,
        getOrcamento,
        getOrcamentos,
        storeOrcamento,
        updateOrcamento,
        destroyOrcamento,
        errors,
    };
};