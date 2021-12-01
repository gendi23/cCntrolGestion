import AuthRepository from "./authRepository";
import BarcoRepository from "./barcoRepository";
import OficinaRepository from "./oficinaRepository";
import OrdenesRepository from "./ordenRepository";

const repositories ={
    auth : AuthRepository,
    barco : BarcoRepository,
    oficina : OficinaRepository,
    ordenes: OrdenesRepository
}

export const RepositoryFactory = {
    get: name => repositories[name]
}