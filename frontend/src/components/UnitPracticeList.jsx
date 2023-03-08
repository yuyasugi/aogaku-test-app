import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";

import { HeaderUser } from "./organizm/HeaderUser";
import { ChakraProvider, Wrap, WrapItem } from "@chakra-ui/react";
import { SelectButton } from "./organizm/SelectButton";
import styled from "styled-components";


    export const UnitPracticeList = () => {
        const { reference_book_id } = useParams();
        const url = `http://localhost:8888/api/unit_practice/${reference_book_id}`;
        const [unitPracticeList, setUnitPracticeList] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.unitPractice);
            setUnitPracticeList(res.data.unitPractice)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("unitPracticeList",unitPracticeList);

    return  (
        <ChakraProvider>
            <HeaderUser />
            <SContainer>
                <>
                <Wrap>
                {unitPracticeList.map((s) => {
            return (
                    <WrapItem>
                        <SelectButton name={s.name} URL={`/issue/${s.id}`} />
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