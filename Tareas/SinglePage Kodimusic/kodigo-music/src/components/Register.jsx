import { useForm } from "react-hook-form";
import * as yup from 'yup';
import { yupResolver } from '@hookform/resolvers/yup';
import './styles/Register.css'
import {createUserWithEmailAndPassword } from "firebase/auth";
import { auth } from "../repositories/firebase/config";

//Match contraseña
const schema = yup.object({
    email: yup.string().email("Inserta un correo valido").required(),
    password: yup.string().required().min(8,"Insertar una contraseña")
    .matches(/[A-Z]/)
    .matches(/[a-z]/)
    .matches(/[0-9]/)
    .matches(/[!@%&#()?¿¡Ç´`+ª<>]/),
    confirm_password: yup.string().oneOf([yup.ref("password")])
})

export const RegisterComponent = () => {
    const {register, handleSubmit} = useForm({
        resolver: yupResolver(schema)
    });

    const onSubmitForm = (data) => {
    console.log(data);
    
    //firebase
    createUserWithEmailAndPassword(auth, data.email, data.password)
    .then((userCredential) => {
    // Signed up 
    const user = userCredential.user;
    // ...
    })
    .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    console.log(errorCode);
    console.log(errorMessage);
    // ..
    });
}

    return(
    <div className="register-container">
      <div className="register-card">
        <h2>¡BIENVENIDO A KODIGO MUSIC!</h2>
        <form onSubmit={handleSubmit(onSubmitForm)}>
          <div className="form-group">
            <label>Email</label>
            <input type="email" {...register("email")} />
          </div>

          <div className="form-group">
            <label>Contraseña</label>
            <input type="password" {...register("password")} />
          </div>

          <div className="form-group">
            <label>Confirmar contraseña</label>
            <input type="password" {...register("confirm_password")} />
          </div>

          <button className="button-submit" type="submit">Registrar</button>
        </form>
      </div>
    </div>
    )
}
