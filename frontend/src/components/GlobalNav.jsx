import React, { useState, useEffect, useContext } from 'react';
import {Link, useHistory} from 'react-router-dom';
import axios from 'axios';
import swal from 'sweetalert';
import { LoginContext } from './providers/LoginProviders';

function GlobalNav () {
    const history = useHistory();

    const { isLogin, setIsLogin } = useContext(LoginContext);

    const logoutSubmit = (e) => {
        e.preventDefault();

        axios.post(`/api/logout`).then(res => {
            if (res.data.status === 200) {
                localStorage.removeItem('auth_token', res.data.token);
                localStorage.removeItem('auth_name', res.data.username);
                swal("ログアウトしました", res.data.message, "success");
                history.push('/');
            }
        });
        setIsLogin(false);
    }

    var AuthButtons = '';

    if (isLogin){
        AuthButtons = (
            <li>
                <div onClick={logoutSubmit}>
                    <span className="text-white">ログアウト</span>
                </div>
            </li>
        );
    } else {
        AuthButtons = (
            <>
            <li>
                <Link to="/register">
                    <span>Register</span>
                </Link>
            </li>
            <li>
                <Link to="/login">
                    <span>Login</span>
                </Link>
            </li>
            </>
        );
    }

    return(
        <ul>
            <li>
                <Link to="/">
                    <span>Top</span>
                </Link>
            </li>
            <li>
                <Link to="/about">
                    <span>About</span>
                </Link>
            </li>
            {AuthButtons}
        </ul>
    )
}

export default GlobalNav;
