import { useForm } from "react-hook-form";
import * as yup from 'yup';
import { yupResolver } from '@hookform/resolvers/yup';
import './styles/Register.css'
import {createUserWithEmailAndPassword } from "firebase/auth";
import { auth } from "../repositories/firebase/config";

//Match contraseña
const schema = yup.object({
    email: yup.string().email("Inserta un correo valido").required(),
    password: yup.string().required("La contraseña es requerida").min(8,"Insertar una contraseña de 8 digitos")
    .matches(/[a-z]/,"La contreña debe contener texto")
    .matches(/[A-Z]/,"Debe contener una Mayuscula")
    .matches(/[0-9]/,"Debe contener un número")
    .matches(/[!@%&#()?¿¡Ç´`+ª<>]/,"Debe contener un caracter especial"),
    confirm_password: yup.string().oneOf([yup.ref("password"),null],"Las contraeñas no coinciden").required("Confirma la contraseña")
})

export const RegisterComponent = () => {
    const {register, handleSubmit, formState: {errors}} = useForm({
        resolver: yupResolver(schema)
    });

    const onSubmitForm = (data) => {
    console.log(data);
    
    //firebase
    createUserWithEmailAndPassword(auth, data.email, data.password)
    .then((userCredential) => {
    // Signed up 
    const user = userCredential.user;
    alert("Registrado con exito " + data.email);
    // ...
    })
    .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    console.log(errorCode);
    console.log(errorMessage);
    
    switch (error.code) {
          case "auth/email-already-in-use":
            alert("El correo ya está registrado.");
            break;
          default:
            alert("Ocurrió un error: " + error.message);
        }

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
            {errors.password && (
              <span className="error-text">{errors.password.message}</span>
            )}
          </div>

          <div className="form-group">
            <label>Confirmar contraseña</label>
            <input type="password" {...register("confirm_password")} />
            {errors.confirm_password && (
              <span className="error-text">{errors.confirm_password.message}</span>
            )}
          </div>

          <button className="button-submit" type="submit">Registrar</button>
        </form>
      </div>
    </div>
    )
}
