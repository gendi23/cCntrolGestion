import Repository from '@/Repository';
const resource = '/auth';

export default {
    /* registro de usuario */
    postSignUp(DTO){
        return Repository.post(`${resource}/signup` , DTO);
    },
    /* login de usuarion */
    postLogin(DTO){
        return Repository.post(`${resource}/login` , DTO);
    }
};