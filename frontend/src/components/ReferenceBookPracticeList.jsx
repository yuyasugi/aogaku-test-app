import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom"
import axios from "axios";
import { ChakraProvider, Wrap, WrapItem } from "@chakra-ui/react";
import { HeaderUser } from "./organizm/HeaderUser";
import { SelectButton } from "./organizm/SelectButton";
import styled from "styled-components";


    export const ReferenceBookPracticeList = () => {
        const { subject_id } = useParams();
        console.log(subject_id)
        const url = `http://localhost:8888/api/reference_book_practice/${subject_id}`;
        const [referenceBookPracticeList, setreferenceBookPracticeList] = useState([])
        useEffect(()=>{
            (async ()=>{
            try{
                const res = await axios.get(url);
            console.log(res.data.referenceBookPractice);
            setreferenceBookPracticeList(res.data.referenceBookPractice)
                return;
            }catch (e){
                return e;
            }
            })();
        },[]);
        console.log("referenceBookPracticeList",referenceBookPracticeList);

    return  (
        <ChakraProvider>
            <HeaderUser />
            <SContainer>
                <>
                <Wrap>
                {referenceBookPracticeList.map((s) => {
            return (
                    <WrapItem>
                        <SelectButton name={s.name} URL={`/unit_practice/${s.id}`} />
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
