import React, { useEffect, useState } from "react";
import axios from "axios";
import { ChakraProvider, Wrap, WrapItem } from "@chakra-ui/react";
import { HeaderUser } from "./organizm/HeaderUser";
import { SelectButton } from "./organizm/SelectButton";
import styled from "styled-components";


    export const AdminEditSubjectList = () => {
        const url = "http://localhost:8888/api/edit_subject";
        const [adminEditSubjectList, setAdminEditSubjectList] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.editSubject);
            setAdminEditSubjectList(res.data.editSubject)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("adminEditSubjectList",adminEditSubjectList);
    return  (
        <ChakraProvider>
            <HeaderUser />
            <SContainer>
                <>
                <Wrap>
                {adminEditSubjectList.map((s) => {
            return (
                    <WrapItem>
                        <SelectButton name={s.name} URL={`/admin/edit_reference_book/${s.id}`} />
                    </WrapItem>
                    )})}
                </Wrap>
                </>
            </SContainer>
        </ChakraProvider>
        )
    }

    const SContainer = styled.div`
    background-color: rgba(1, 75, 21, 40%);
    height: 200vh;
    width: 100%;
    `
