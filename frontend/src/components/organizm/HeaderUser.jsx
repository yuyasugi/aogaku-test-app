import React from "react";

import { Box, ChakraProvider } from "@chakra-ui/react";

    export const HeaderUser = () => {
        return(
            <ChakraProvider>
                <Box bg='rgba(1, 75, 21, 85%)' w='100%' p={4} color='white' fontWeight={"bold"}>
                    {/* ここは画像を挿入したい */}
                    青学コーチング
                </Box>
            </ChakraProvider>
        )
    }
