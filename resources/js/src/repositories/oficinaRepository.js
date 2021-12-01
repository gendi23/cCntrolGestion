import Repository from '@/Repository';
const resource = '/oficina';

export default {
    /* obtener listado de oficina */
    getOficinas(){
        return Repository.get(`${resource}`);
    },
};