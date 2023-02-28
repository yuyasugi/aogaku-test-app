import React from "react";
import styled from "styled-components";

import { HeaderUser } from "./organizm/HeaderUser";
import { Button, ChakraProvider } from "@chakra-ui/react";
import { useHistory } from "react-router-dom";


    export const Home = () => {
        const history = useHistory();

        const moveTest = () => {
            history.push('/subject_test');
        };
        const movePractice = () => {
            history.push('/subject_practice');
        };

        return(
            <ChakraProvider>
                <SContainer>
                    <STextBox>
                    <STitle>青学コーチング</STitle>
                    <SSabTitle>テストツール</SSabTitle>
                    </STextBox>
                    <SButtonBox>
                    <Button onClick={moveTest} borderWidth='1px' shadow='lg' colorScheme='whiteAlpha' width={350} height={200} marginRight={12} fontSize={20} borderRadius={100}>
                        確認テストを受ける
                    </Button>
                    <Button onClick={movePractice} borderWidth='1px' shadow='lg' colorScheme='whiteAlpha' width={350} height={200} fontSize={20} borderRadius={100}>
                        練習問題を解く
                    </Button>
                    </SButtonBox>
                </SContainer>
            </ChakraProvider>
        )
    }

    const SContainer = styled.div`
    background-color: rgba(1, 75, 21, 85%);
    height: 100vh;
    width: 100%;
    `

    const STextBox = styled.div`
    margin-left: 15%;
    padding-top: 7%;
    `

    const SButtonBox = styled.div`
    text-align: center;
    padding-top: 7%;
    `

    const STitle = styled.h1`
    font-size: 60px;
    font-weight: 900;
    color: #FFFFFF;
    letter-spacing: 0.1em;
    `

    const SSabTitle = styled.p`
    font-size: 20px;
    font-weight:bold;
    color: #FFFFFF;
    `
