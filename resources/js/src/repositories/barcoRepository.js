import Repository from '@/Repository';
const resource = '/barco';

export default {
    /* obtener todos los barcos registrado */
    getBarcos(){
        return Repository.get(`${resource}`);
    },
    
    /* insertar */
    potsBarco(DTO){
        return Repository.post(`${resource}/potsBarco` , DTO);
    },
    /* Editar */
    updatedBarco(id ,DTO){
        return Repository.post(`${resource}/{id}` , DTO);
    },
    /* Eliminar */
    destroyBarco(id ){
        return Repository.delete(`${resource}/${id}/delete`);
    },
    /* Generar orden */
    potsOrden(DTO){
        return Repository.post(`${resource}/orden` , DTO);
    }
};