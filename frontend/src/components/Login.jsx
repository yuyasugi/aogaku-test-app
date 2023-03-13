import React, { useContext, useState } from "react";
import swal from "sweetalert";
import { useHistory } from 'react-router-dom';
import axios from 'axios';
import { LoginContext } from "./providers/LoginProviders";
import { Button, Card, CardBody, ChakraProvider, Input } from "@chakra-ui/react";
import styled from "styled-components";

function Login() {
    const { setIsLogin } = useContext(LoginContext);
    const history = useHistory();

    const moveRegister = () => {
        history.push('/register');
    };

    const [loginInput, setLogin] = useState({
        email: '',
        password: '',
        error_list: [],
    });

    const handleInput = (e) => {
        e.persist();
        setLogin({...loginInput, [e.target.name]: e.target.value});
    }

    const loginSubmit = (e) => {
        e.preventDefault();

        const data = {
            email: loginInput.email,
            password: loginInput.password,
        }

        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post(`api/login`, data).then(res => {
                if(res.data.status === 200){
                    localStorage.setItem('auth_token', res.data.token);
                    localStorage.setItem('auth_name', res.data.username);
                    setIsLogin(true);
                    swal("ログイン成功", res.data.message, "success");
                    history.push('/');
                } else if (res.data.status === 401){
                    swal("注意", res.data.message, "warning");
                } else {
                    setLogin({...loginInput, error_list: res.data.validation_errors});
                }
            });
        });
    }

    return (
        <ChakraProvider>
            <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-6 col-lg-6 mx-auto">
                    <div>
                        <img src="" alt="" />
                    </div>
                    <Card maxW='sm'  margin="auto" marginTop="20%">
                        <CardBody>
                        <SCardHeader>
                            <h4>ログイン</h4>
                        </SCardHeader>
                        <div className="card-body">
                            <form onSubmit={loginSubmit}>
                                <div className="form-group mb-3">
                                    <label>メールアドレス</label>
                                    <Input type="email" name="email" onChange={handleInput} value={loginInput.email} className="form-control" focusBorderColor="green.700" />
                                    <span>{loginInput.error_list.email}</span>
                                </div>
                                <div className="form-group mb-3">
                                    <label>パスワード</label>
                                    <Input type="password" name="password" onChange={handleInput} value={loginInput.password} className="form-control" focusBorderColor="green.700" />
                                    <span>{loginInput.error_list.password}</span>
                                </div>
                                <div className="form-group mb-3">
                                    <Button type="submit" marginTop={3} marginRight={2} color="green.700">ログイン</Button>
                                    <Button type="submit" marginTop={3} onClick={moveRegister} color="green.700">新規登録へ</Button>
                                </div>
                            </form>
                        </div>
                        </CardBody>
                    </Card>
                </div>
            </div>
        </div>
        </ChakraProvider>
    );
}

const SCardHeader = styled.div`
margin-bottom: 10px;
    }
    `



export default Login;
