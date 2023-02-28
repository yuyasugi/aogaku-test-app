import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";


    export const AdminEditProblem = () => {
        const { id } = useParams();
        const url = `http://localhost:8888/api/edit/${id}`;
        const [adminEditProblem, setAdminEditProblem] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.issue);
            setAdminEditProblem(res.data.issue)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("adminEditProblem",adminEditProblem);

    return  (
        <>
        <div>{adminEditProblem.problem}</div>
        <div>{adminEditProblem.anser}</div>
        <div>{adminEditProblem.commentary}</div>
        </>
        )
    }
