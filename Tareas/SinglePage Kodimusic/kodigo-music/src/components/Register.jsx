import { useForm } from "react-hook-form";
import * as yup from 'yup';
import { yupResolver } from '@hookform/resolvers/yup';

const schema = yup.object({
    email: yup.string().email("Inserta un correo valido").required(),
    password: yup.string().required().min(8,"Insertar una contraseña")
    .matches(/[A-Z]/)
    .matches(/[a-z]/)
    .matches(/[!@%&#()?¿¡Ç´`+ª<>]/),
    confirm_password: yup.string().oneOf([yup.ref("password")])
})

export const RegisterComponent = () => {
    const {register, handleSubmit} = useForm({
        resolver: yupResolver(schema)
    });

    const onSubmitForm = (data) => {
    console.log(data);
}

    return(
        <div>Registrar
            <form onSubmit={handleSubmit(onSubmitForm)}>
                <label className="FormLabel">Email: </label>
                <input type="text" className="form-control" name="input-email" {...register('email')}/>
                <label className="FormLabel">Password: </label>
                <input type="text" className="form-control" name="input-password"{...register('password')}/>
                <label className="FormLabel">Confirm password: </label>
                <input type="text" className="form-control" name="input-password"{...register('confirm_password')}/>
                <button>Send</button>
            </form>
        </div>
    )
}
