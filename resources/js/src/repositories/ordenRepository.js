import Repository from '@/Repository';
const resource = '/orden';

export default {
    /* obtener todos los barcos registrado */
    getOrdenes(){
        return Repository.get(`${resource}`);
    },
};